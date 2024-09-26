const cardsContainer = document.getElementById('cardsContainer');
const totalCards = 12; // Let's say we have 30 cards for the example
const cardsToShow = 6;
let currentIndex = 0;

// Create and append cards
const cardWords = [

];

// Create and append cards
for (let i = 0; i < totalCards; i++) {
    const card = document.createElement('div');
    card.classList.add('card');
    
    // Ensure we don't exceed the length of cardWords
    if (i < cardWords.length) {
        card.textContent = cardWords[i];
    } else {
      
    }
    
    cardsContainer.appendChild(card);
}

// Function to handle the sliding
function slide(direction) {
    currentIndex += direction * cardsToShow;

    if (currentIndex < 0) {
        currentIndex = 0;
    }
    if (currentIndex > totalCards - cardsToShow) {
        currentIndex = totalCards - cardsToShow;
    }

    const offset = -(currentIndex * (150 + 20)); // 150 is card width, 20 is margin
    cardsContainer.style.transform = `translateX(${offset}px)`;
}
