function toggleHeart() {
    const heart = document.getElementById('heart');
    const fullHeart = heart.getAttribute('aria-expanded');
    if(fullHeart === "true") {
        heart.setAttribute('aria-expanded', "false");
    }
    else {
        heart.setAttribute('aria-expanded', "true");
    }
}
