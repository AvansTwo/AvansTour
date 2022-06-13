function markerClick(question_id, team_hash) {
    console.log(question_id);
    console.log(team_hash);

    document.location.href = `/quiz/spelen/${team_hash}/vraag/${question_id}`;
}



// Default callbacks
function noMarkerCallback() {
    console.log('No marker callback specified');
}

function noMapCallback() {
    console.log('No map callback specified');
}