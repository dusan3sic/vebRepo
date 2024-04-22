fetch('link')
  .then(response => {
    if (response.ok) {
      // Parse the JSON response body
      return response.json();
    } else {
      // If response status is not OK, throw an error
      throw new Error('Network response was not ok.');
    }
  })
  .then(data => {
    // Process the retrieved data
    console.log(data);
  })
  .catch(error => {
    // Handle any errors that occurred during the fetch
    console.error('Fetch error:', error);
  });

users.sort((a, b) => b.points - a.points);

function displayLeaderboard() {
    var leaderboardTable = document.getElementById('leaderboard');
    var leaderboardBody = leaderboardTable.getElementsByTagName('tbody')[0];

    leaderboardBody.innerHTML = '';

    users.forEach(user => {
        var row = leaderboardBody.insertRow();
        row.insertCell(0).textContent = user.username;
        row.insertCell(1).textContent = user.points;
    });
}

document.addEventListener('DOMContentLoaded', function() {
    displayLeaderboard();
});