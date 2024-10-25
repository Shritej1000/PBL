document.getElementById('recommendationForm').addEventListener('submit', function(event) {
    const percentileInput = document.getElementById('percentile');
    if (percentileInput.value < 0 || percentileInput.value > 100) {
        alert("Please enter a valid percentile between 0 and 100.");
        event.preventDefault();
    }
});
