var cards = document.querySelectorAll(".card");
var currentCard = 0;

var prevBtn = document.getElementById("prevBtn");
prevBtn.addEventListener("click", function() {
	cards[currentCard].classList.remove("active", "flipped");
	currentCard = (currentCard - 1 + cards.length) % cards.length;
	cards[currentCard].classList.add("active");
});

var nextBtn = document.getElementById("nextBtn");
nextBtn.addEventListener("click", function() {
	cards[currentCard].classList.remove("active", "flipped");
	currentCard = (currentCard + 1) % cards.length;
	cards[currentCard].classList.add("active");
});

cards[currentCard].classList.add("active");

cards.forEach(function(card) {
	card.addEventListener("click", function() {
		card.classList.toggle("flipped");
	});
});