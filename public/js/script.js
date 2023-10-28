function show() {
  var p = document.getElementById("pwd");
  p.setAttribute("type", "text");
}

function hide() {
  var p = document.getElementById("pwd");
  p.setAttribute("type", "password");
}

var pwShown = 0;

document.getElementById("eye").addEventListener(
  "click",
  function () {
    if (pwShown == 0) {
      pwShown = 1;
      show();
    } else {
      pwShown = 0;
      hide();
    }
  },
  false
);

var words = ["Powered by"],
  part,
  i = 0,
  offset = 0,
  len = words.length,
  forwards = true,
  skip_count = 0,
  skip_delay = 15,
  speed = 140;
var wordflick = function () {
  setInterval(function () {
    if (forwards) {
      if (offset >= words[i].length) {
        ++skip_count;
        if (skip_count == skip_delay) {
          forwards = false;
          skip_count = 0;
        }
      }
    } else {
      if (offset == 0) {
        forwards = true;
        i++;
        offset = 0;
        if (i >= len) {
          i = 0;
        }
      }
    }
    part = words[i].substr(0, offset);
    if (skip_count == 0) {
      if (forwards) {
        offset++;
      } else {
        offset--;
      }
    }
    $(".word").text(part);
  }, speed);
};

$(document).ready(function () {
  wordflick();
});

var placeholderTexts = ["@EmailAdress", "@UserName"];

var index = 0;
var speedplaceholder = 800; // Smanjena brzina (promijenite je prema željenoj brzini)
var interval;
var currentIndex = 0;

function changePlaceholder() {
  var inputElement = document.getElementById("txt-input-animation");

  function animateText() {
    var placeholder = placeholderTexts[currentIndex];
    var part = "";
    var i = 0;

    interval = setInterval(function () {
      part += placeholder[i];
      inputElement.placeholder = part;
      i++;

      if (i === placeholder.length) {
        clearInterval(interval);
        setTimeout(function () {
          clearPlaceholder(placeholder);
        }, 1000); // Change back to the original placeholder after 1 second
      }
    }, speedplaceholder);
  }

  function clearPlaceholder(text) {
    var i = text.length;

    interval = setInterval(function () {
      text = text.slice(0, -1);
      inputElement.placeholder = text;
      i--;

      if (i === 0) {
        clearInterval(interval);
        currentIndex = (currentIndex + 1) % placeholderTexts.length;
        setTimeout(animateText, 0); // Start the next animation after 7 seconds
      }
    }, speedplaceholder);
  }

  animateText();
}

window.onload = changePlaceholder;

// Dohvatimo element ikone
var eyeIcon = document.getElementById("eye");

// Dodajemo event listener za klik
eyeIcon.addEventListener("click", function () {
  // Provjerimo trenutni class atribut
  if (eyeIcon.className === "fa fa-eye-slash") {
    // Ako je trenutni class "fa fa-eye-slash", promijenimo ga u "fa fa-eye"
    eyeIcon.className = "fa fa-eye";
  } else {
    // Inače, promijenimo ga natrag u "fa fa-eye-slash"
    eyeIcon.className = "fa fa-eye-slash";
  }
});

var inputs = document.querySelectorAll(".file-input");

for (var i = 0, len = inputs.length; i < len; i++) {
  customInput(inputs[i]);
}

function customInput(el) {
  const fileInput = el.querySelector('[type="file"]');
  const label = el.querySelector("[data-js-label]");

  fileInput.onchange = fileInput.onmouseout = function () {
    if (!fileInput.value) return;

    var value = fileInput.value.replace(/^.*[\\\/]/, "");
    el.className += " -chosen";
    label.innerText = value;
  };

  document.addEventListener("DOMContentLoaded", function () {
    const inputElement = document.getElementById("txt-input-animation");

    inputElement.addEventListener("click", function () {
      inputElement.value = null; // Clear any previously selected file
    });

    inputElement.addEventListener("change", function () {
      const selectedFile = inputElement.files[0];
      if (selectedFile) {
        const reader = new FileReader();
        reader.onload = function () {
          // Do something with the file content, e.g., display it
          console.log(reader.result);
        };
        reader.readAsText(selectedFile);
      }
    });
  });
}
