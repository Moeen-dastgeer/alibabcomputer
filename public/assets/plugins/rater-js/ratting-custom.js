function onload(event) {
    var starRating1 = raterJs({
        starSize: 30,
        element: document.querySelector("#rater"),
        rateCallback: function rateCallback(rating, done) {
            this.setRating(rating);
            done();
            $('#ratting').val(rating);
        }
    });
}

window.addEventListener("load", onload, false);

function onload1(event) {
    var starRating1 = raterJs({
        starSize: 30,
        element: document.querySelector("#rater1"),
        rateCallback: function rateCallback(rating, done) {
            this.setRating(rating);
            done();
            $('#ratting1').val(rating);
        }
    });
}

window.addEventListener("load", onload1, false);