function JSalert() {
    // A confirm dialog
    alertify.confirm(
        "Weet je zeker dat je de tour wilt afronden?",
        "Zodra de tour is afgerond kan je niet meer terug!",

        function () {
            alertify.success("Tour afgerond");
        },

        function () {
            alertify.error("Tour afronden gecanceld");
        }
    );
}
