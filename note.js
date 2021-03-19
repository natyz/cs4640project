// AUTHORS: NATALIE & WAN

// FUNCTIONS FOR FORMATING TEXT IN NOTE
function boldText() {
    var target = document.getElementById("note");
    if (target.style.fontWeight == "bolder") {
        target.style.fontWeight = "normal";
    } else {
        target.style.fontWeight = "bolder";
    }
}

function italicText() {
    var target = document.getElementById("note");
    if (target.style.fontStyle == "italic") {
        target.style.fontStyle = "normal";
    } else {
        target.style.fontStyle = "italic";
    }
}

function underlineText() {
    var target = document.getElementById("note");
    if (target.style.textDecoration == "underline") {
        target.style.textDecoration = "none";
    } else {
        target.style.textDecoration = "underline";
    }
}
// https://stackoverflow.com/questions/38218268/how-to-make-selected-text-bold-italic-underlined-in-javascript/38219172