<script>

function showDiv() {
  var selectBox = document.getElementById("mySelect");
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  if (selectedValue == 'outsource') {
    document.getElementById("myDiv").style.display = "block";
  } else {
    document.getElementById("myDiv").style.display = "none";
  }
}

</script>

<script>
    function radioDiv(divToShow, divToHide) {
        var divToShowElement = document.getElementById(divToShow);
        var divToHideElement = document.getElementById(divToHide);
        divToShowElement.style.display = 'block';
        divToHideElement.style.display = 'none';
    }
</script>
