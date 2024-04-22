var users = [
    { username: 'user1', points: 100 },
    { username: 'user2', points: 75 },
    { username: 'user3', points: 120 },
    { username: 'user4', points: 90 }
];

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