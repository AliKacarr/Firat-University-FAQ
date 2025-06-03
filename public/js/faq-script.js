let allFaqData = []; // Tüm SSS'leri saklamak için

// Form submit olayını engelle
document.getElementById('askForm').addEventListener('submit', function(e) {
    e.preventDefault();
});

async function loadFaq() {
    const res = await fetch('/faq/all');
    const data = await res.json();
    if (data.success) {
        allFaqData = data.data;
        renderFaqList(data.data);
    } else {
        console.error('SSS yükleme hatası:', data.error);
        const faqRoot = document.getElementById('faq-root');
        faqRoot.innerHTML = '<p>SSS yüklenirken bir hata oluştu: ' + (data.error || 'Bilinmeyen hata') + '</p>';
    }
}

// SSS listesini ekrana basan fonksiyon
function renderFaqList(data) {
    const faqRoot = document.getElementById('faq-root');
    faqRoot.innerHTML = '';

    const grouped = groupByCategory(data);

    Object.keys(grouped).forEach(category => {
        appendCategoryTitle(faqRoot, category);
        grouped[category].forEach(item => appendFaqItem(faqRoot, item));
    });

    setupToggleFunctionality(faqRoot);
}

function groupByCategory(data) {
    return data.reduce((grouped, item) => {
        const cat = item.category || 'Diğer';
        if (!grouped[cat]) grouped[cat] = [];
        grouped[cat].push(item);
        return grouped;
    }, {});
}

function appendCategoryTitle(faqRoot, category) {
    const catTitle = document.createElement('div');
    catTitle.className = 'faq-category-title';
    catTitle.textContent = category;
    faqRoot.appendChild(catTitle);
}

function appendFaqItem(faqRoot, item) {
    const faqItem = document.createElement('div');
    faqItem.className = 'faq-item';
    faqItem.setAttribute('data-id', item.id);
    faqItem.innerHTML = `
        <div class="faq-question"><span class="faq-icon-box"><span class="faq-icon">+</span></span><span class="faq-text"><b>${item.question}</b></span></div>
        <div class="answer-collapse">
            <div class="faq-answer">${item.answer}</div>
        </div>
    `;
    faqRoot.appendChild(faqItem);
}

function setupToggleFunctionality(faqRoot) {
    faqRoot.querySelectorAll('.faq-question').forEach(q => {
        q.addEventListener('click', () => {
            faqRoot.querySelectorAll('.faq-question').forEach(otherQ => {
                if (otherQ !== q) {
                    otherQ.classList.remove('active');
                    otherQ.querySelector('.faq-icon').textContent = '+';
                    const otherCollapse = otherQ.parentElement.querySelector('.answer-collapse');
                    if (otherCollapse) {
                        otherCollapse.style.maxHeight = null;
                    }
                }
            });
            toggleFaqItem(q);
        });
    });
}

function toggleFaqItem(q) {
    const isActive = q.classList.contains('active');
    const collapse = q.parentElement.querySelector('.answer-collapse');
    if (isActive) {
        q.classList.remove('active');
        q.querySelector('.faq-icon').textContent = '+';
        if (collapse) collapse.style.maxHeight = null;
    } else {
        q.classList.add('active');
        q.querySelector('.faq-icon').textContent = '–';
        if (collapse) {
            collapse.style.maxHeight = collapse.scrollHeight + "px";
        }
    }
}

// Soru sorma alanı için input ile filtreleme
document.getElementById('question').addEventListener('input', function (e) {
    const search = e.target.value.trim().toLowerCase();
    if (search === "") {
        renderFaqList(allFaqData);
        return;
    }

    // Arama terimlerini kelimelere ayır
    const searchTerms = search.split(/\s+/).filter(term => term.length > 0);

    // Her SSS için benzerlik puanı hesapla
    const scoredResults = allFaqData.map(item => {
        const question = item.question.toLowerCase();
        const answer = (item.answer || '').toLowerCase();

        // Her kelime için benzerlik puanı hesapla
        const score = searchTerms.reduce((totalScore, term) => {
            // Tam eşleşme kontrolü
            if (question.includes(term) || answer.includes(term)) {
                return totalScore + 1;
            }

            // Kısmi eşleşme kontrolü (en az 3 karakter)
            if (term.length >= 3) {
                const questionWords = question.split(/\s+/);
                const answerWords = answer.split(/\s+/);

                // Soru ve cevaptaki kelimelerle karşılaştır
                const wordMatch = [...questionWords, ...answerWords].some(word => {
                    // Kelime benzerliği kontrolü
                    return word.includes(term) || term.includes(word) ||
                           levenshteinDistance(word, term) <= 2; // 2 karaktere kadar farklılığa izin ver
                });

                if (wordMatch) {
                    return totalScore + 0.5;
                }
            }

            return totalScore;
        }, 0);

        return { ...item, score };
    });

    // Benzerlik puanına göre sırala ve puanı 0'dan büyük olanları filtrele
    const filtered = scoredResults
        .filter(item => item.score > 0)
        .sort((a, b) => b.score - a.score);

    renderFaqList(filtered);
});

// Levenshtein mesafesi hesaplama fonksiyonu (kelimeler arasındaki benzerliği ölçer)
function levenshteinDistance(a, b) {
    if (a.length === 0) return b.length;
    if (b.length === 0) return a.length;

    const matrix = [];

    for (let i = 0; i <= b.length; i++) {
        matrix[i] = [i];
    }

    for (let j = 0; j <= a.length; j++) {
        matrix[0][j] = j;
    }

    for (let i = 1; i <= b.length; i++) {
        for (let j = 1; j <= a.length; j++) {
            if (b.charAt(i - 1) === a.charAt(j - 1)) {
                matrix[i][j] = matrix[i - 1][j - 1];
            } else {
                matrix[i][j] = Math.min(
                    matrix[i - 1][j - 1] + 1,
                    matrix[i][j - 1] + 1,
                    matrix[i - 1][j] + 1
                );
            }
        }
    }

    return matrix[b.length][a.length];
}

// Sayfa yüklendiğinde SSS'leri yükle
loadFaq();
