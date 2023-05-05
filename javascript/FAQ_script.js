var questions = document.querySelectorAll(".faq .question");

questions.forEach(function(question) {
  question.addEventListener("click", function() {
    var answer = this.nextElementSibling;
    var isShowing = answer.classList.contains("show");

    if (isShowing) {
      answer.classList.remove("show");
    } else {
      answer.classList.add("show");
    }
  });
});
