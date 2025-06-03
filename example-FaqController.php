<?php

require_once __DIR__ . '/../models/FaqModel.php';

class FaqController {
    private $model;
    private $openaiApiKey;
    private $openaiBaseUrl;

    public function __construct() {
        $this->model = new FaqModel();
        $env = parse_ini_file(__DIR__ . '/../../.env');
        $this->openaiApiKey = $env['OPENAI_API_KEY'];
        $this->openaiBaseUrl = $env['OPENAI_BASE_URL'] ?? "https://generativelanguage.googleapis.com/v1/models/gemini-2.0-flash:generateContent";
    }

    public function handleRequest() {
        if (isset($_GET['question'])) {
            $this->handleQuestion();
        } else if (isset($_GET['getAll']) && $_GET['getAll'] === 'true') {
            $this->getAllFaqs();
        }
    }

    private function handleQuestion() {
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');
        header('X-Accel-Buffering: no');

        $userQuestion = $_GET['question'];
        $knowledgeBase = $this->model->getKnowledgeBase();

        try {
            $systemPrompt = "
            Sen yardımcı bir asistansın. Yalnızca bu bilgilerden faydalanarak, Fırat Üniversitesi hakkında en uygun cevabı ver. Vereceğin cevap 5 cümleden fazla olmasın. Eğer bilgi yoksa \"Cevap bulunamadı.\" yaz. Sıkça sorulan sorular ve cevapları:
            {$knowledgeBase}";

            $url = $this->openaiBaseUrl . "?key=" . $this->openaiApiKey;
            
            $data = [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $systemPrompt],
                            ['text' => $userQuestion]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'topK' => 40,
                    'topP' => 0.95,
                    'maxOutputTokens' => 1024,
                ]
            ];

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json'
            ]);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);

            curl_setopt($ch, CURLOPT_WRITEFUNCTION, function($ch, $data) {
                static $fullAnswer = "";
                
                $responseData = json_decode($data, true);
                if ($responseData && isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
                    $content = $responseData['candidates'][0]['content']['parts'][0]['text'];
                    $fullAnswer = $content;
                    
                    echo 'data: ' . json_encode(['answer' => $fullAnswer, 'complete' => true]) . "\n\n";
                    ob_flush();
                    flush();
                }
                return strlen($data);
            });

            $response = curl_exec($ch);
            
            if (curl_errno($ch)) {
                throw new Exception('cURL Hatası: ' . curl_error($ch));
            }

            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpcode != 200) {
                if (!headers_sent()) {
                    http_response_code($httpcode);
                    echo 'data: ' . json_encode(['error' => 'API HTTP Hatası: ' . $httpcode, 'complete' => true]) . "\n\n";
                } else {
                    echo 'data: ' . json_encode(['error' => 'API HTTP Hatası: ' . $httpcode, 'complete' => true]) . "\n\n";
                }
                ob_flush();
                flush();
            }

            curl_close($ch);

        } catch (Exception $e) {
            error_log('API hatası: ' . $e->getMessage());
            if (!headers_sent()) {
                http_response_code(500);
                header('Content-Type: application/json');
                echo json_encode(['success' => false, 'error' => 'Sunucu hatası: ' . $e->getMessage()]);
            } else {
                echo 'data: ' . json_encode(['error' => 'Sunucu hatası: ' . $e->getMessage(), 'complete' => true]) . "\n\n";
                ob_flush();
                flush();
            }
        }
    }

    private function getAllFaqs() {
        header('Content-Type: application/json');
        $faqs = $this->model->getAllFaqs();
        echo json_encode(["success" => true, "data" => $faqs]);
    }
} 