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
            console.log(i);
            matchesContainer.append("<div class='match'>" + i + "</div>");
        }
    }
}

$(document).ready(function() {

    const matches = [
        { "id": 1, "name": "Team 1", "score": 0 },
        { "id": 2, "name": "Team 2", "score": 0 },
        { "id": 3, "name": "Team 3", "score": 0 },
        { "id": 4, "name": "Team 4", "score": 0 },
        { "id": 5, "name": "Team 5", "score": 0 },
        { "id": 6, "name": "Team 6", "score": 0 },
        { "id": 7, "name": "Team 7", "score": 0 },
        { "id": 8, "name": "Team 8", "score": 0 },
        { "id": 9, "name": "Team 9", "score": 0 },
        { "id": 10, "name": "Team 10", "score": 0 },
        { "id": 11, "name": "Team 11", "score": 0 },
        { "id": 12, "name": "Team 12", "score": 0 },
        { "id": 13, "name": "Team 13", "score": 0 },
        { "id": 14, "name": "Team 14", "score": 0 },
        { "id": 15, "name": "Team 15", "score": 0 },
        { "id": 16, "name": "Team 16", "score": 0 },
        { "id": 17, "name": "Team 17", "score": 0 },
        { "id": 18, "name": "Team 18", "score": 0 },
        { "id": 19, "name": "Team 19", "score": 0 },
        { "id": 20, "name": "Team 20", "score": 0 },
        { "id": 21, "name": "Team 21", "score": 0 },
        { "id": 22, "name": "Team 22", "score": 0 },
        { "id": 23, "name": "Team 23", "score": 0 },
        { "id": 24, "name": "Team 24", "score": 0 },
        { "id": 25, "name": "Team 25", "score": 0 },
        { "id": 26, "name": "Team 26", "score": 0 },
        { "id": 27, "name": "Team 27", "score": 0 },
        { "id": 28, "name": "Team 28", "score": 0 },
        { "id": 29, "name": "Team 29", "score": 0 },
        { "id": 30, "name": "Team 30", "score": 0 },
        { "id": 31, "name": "Team 31", "score": 0 },
        { "id": 32, "name": "Team 32", "score": 0 }
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