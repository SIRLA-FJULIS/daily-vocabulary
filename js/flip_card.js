window.addEventListener("load", function() {
	addCard();
});

function addCard() {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', './manage/lib/get_all_voc.php', true);
	xhr.onreadystatechange = function() {
		if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
			var data = xhr.responseText.split('<br>');
			var voc_data = [];
			for (var i = 0; i < data.length-1; i++) {
				var row = data[i].split(',');
				var obj = {
					voc_eng: row[0],
					voc_chi: row[1],
					part_of_speech: row[2]
				};
				voc_data.push(obj);
			}
			var cardContainer = document.getElementById('cardContainer');
			for (var i = 0; i < voc_data.length; i++) {
				var card = document.createElement('div');
				card.className = "card";
				card.innerHTML = `
					<div class="front">
					<div class="title">${voc_data[i].voc_eng}</div>
					<div class="part-of-speech">${voc_data[i].part_of_speech}</div>
					</div>
					<div class="back">
					<div class="title">${voc_data[i].voc_chi}</div>
					</div>
				`;
				cardContainer.insertBefore(card, cardContainer.childNodes[2]);
			}
			initialize();
		}
	};
	xhr.send();
}

function initialize() {
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
	cards.forEach(function(card) {
		card.addEventListener("click", function() {
			card.classList.toggle("flipped");
		});
	});
	cards[currentCard].classList.add("active");
}