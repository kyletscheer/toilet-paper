function validateForm(event) {
  event.preventDefault(); // Prevent form submission

  const toiletPaperDiameter = parseFloat(document.getElementById("aVal").value);
  const innerTubeDiameter = parseFloat(document.getElementById("bVal").value);
  const errorMessage = document.getElementById("error-message");
  const resultsContainer = document.getElementById("results");

  if (toiletPaperDiameter <= innerTubeDiameter) {
    errorMessage.textContent = "Toilet paper diameter must be larger than the inner tube diameter.";
    errorMessage.style.display = "block";
    resultsContainer.style.display = "none"; // Hide the result container
  } else {
    errorMessage.style.display = "none"; // Hide the error message
    resultsContainer.style.display = "block"; // Display the result container

    var y = parseFloat($("#yVal").val());
    var a = parseFloat($("#aVal").val());
    var b = parseFloat($("#bVal").val());

    var pi = 3.14159265359;
    var diameter = 2 * Math.sqrt(((((pi * ((a / 2) ** 2)) - (pi * ((b / 2) ** 2))) / (1 / y)) + (pi * ((b / 2) ** 2))) /
      pi);
    diameter = diameter.toFixed(2);
    var distancefromtube = (diameter - b) / 2;
    distancefromtube = distancefromtube.toFixed(2);
    var percentage = (((1 - (a - diameter) / (a - b)) * 100)).toFixed(3);

    var result = "<h5>The diameter of " + (y * 100).toFixed(2) +
      "% of the toilet paper left is <b>" + diameter +
      "</b>. That is a distance of " + distancefromtube +
      " from the edge of the toilet paper. This is equivalent to " +
      percentage + "% of the distance from the edge of the cardboard to the edge of the full toilet paper.</h5>";

    $("#result").html(result);

    var midpointsize = (diameter / a) * 200;
    var midpointoffset = (200 - midpointsize) / 2;
    var tubesize = (b / a) * 200;
    var tubeoffset = (midpointsize - tubesize) / 2 - 2;

    $(".midpoint").css("width", midpointsize + "px").css("height", midpointsize + "px").css("top", midpointoffset + "px");
    $(".tube").css("width", tubesize + "px").css("height", tubesize + "px").css("top", tubeoffset + "px");
  }
}