function setCurrentPage(page, nbPages, matches) {
    if (page < 1 || page > nbPages) {
        return;
    }

    let start = (page - 1) * 12;
    let end = page * 12;

    const matchesContainer = $("#content > .matches").first();
    matchesContainer.empty();

    for (let i = start; i < end; i++) {
        let match = matches[i];
        if (match !== undefined) {
            let hours = match.date.split(" ")[1];
            matchesContainer.append("<div class='match'>" +
                "<div class='match-banner'>" +
                "<div class='match-hours'>" + hours + "</div>" +
                "</div>" +
                "<div class='match-infos'>" +
                "<div class='match-title'><i><span class='match-team-1'>" + match.team1 + "</span></i> <b>VS</b> <i><span class='match-team-2'>" + match.team2 + "</span></i></div>" +
                "<div class='match-token'><span class='token'>" + match.token + "</span><img src='/assets/images/token.png' alt=''></div>" +
                "</div>" +
                "</div>");
        }
    }
}

$(document).ready(function() {

    const matches = [
        { "id": 1, "team1": "RED", "team2" : "BLUE", "token": 500, "date" : "2021-01-01 20:55:11" },
        { "id": 2, "team1": "RED", "team2" : "BLUE", "token": 115, "date" : "2021-01-01 20:56:12" },
        { "id": 3, "team1": "RED", "team2" : "BLUE", "token": 100, "date" : "2021-01-01 20:57:13" },
        { "id": 4, "team1": "RED", "team2" : "BLUE", "token": 200, "date" : "2021-01-01 20:58:14" },
        { "id": 5, "team1": "RED", "team2" : "BLUE", "token": 300, "date" : "2021-01-01 20:59:15" },
        { "id": 6, "team1": "RED", "team2" : "BLUE", "token": 400, "date" : "2021-01-01 21:00:16" },
        { "id": 7, "team1": "RED", "team2" : "BLUE", "token": 500, "date" : "2021-01-01 21:01:17" },
        { "id": 8, "team1": "RED", "team2" : "BLUE", "token": 600, "date" : "2021-01-01 21:02:18" },
        { "id": 9, "team1": "RED", "team2" : "BLUE", "token": 700, "date" : "2021-01-01 21:03:19" },
        { "id": 10, "team1": "RED", "team2" : "BLUE", "token": 800, "date" : "2021-01-01 21:04:20" },
        { "id": 11, "team1": "RED", "team2" : "BLUE", "token": 900, "date" : "2021-01-01 21:05:21" },
        { "id": 12, "team1": "RED", "team2" : "BLUE", "token": 1000, "date" : "2021-01-01 21:06:22" },
        { "id": 13, "team1": "RED", "team2" : "BLUE", "token": 1100, "date" : "2021-01-01 21:07:23" },
        { "id": 14, "team1": "RED", "team2" : "BLUE", "token": 1200, "date" : "2021-01-01 21:08:24" },
        { "id": 15, "team1": "RED", "team2" : "BLUE", "token": 1300, "date" : "2021-01-01 21:09:25" },
    ];

    const paginationContainer = $("#content > .footer > .paging > span").first();
    const previousButton = $("#content > .footer > .paging > .previous").first();
    const nextButton = $("#content > .footer > .paging > .next").first();

    let nbPages = Math.ceil(matches.length / 12);
    let currentPage = 1;
    paginationContainer.text("1 / " + nbPages);

    setCurrentPage(currentPage, nbPages, matches);

    previousButton.click(function() {
        if (currentPage > 1) {
            currentPage--;
            paginationContainer.text(currentPage + " / " + nbPages);
            setCurrentPage(currentPage, nbPages, matches);
        }
    });

    nextButton.click(function() {
        if (currentPage < nbPages) {
            currentPage++;
            paginationContainer.text(currentPage + " / " + nbPages);
            setCurrentPage(currentPage, nbPages, matches);
        }
    });

});