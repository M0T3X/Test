function hideAndShow(IdToHide, IdToShow) {
	toggleVisibilityById(IdToHide);
    toggleVisibilityById(IdToShow);
}

function toggleVisibilityById(IdToToggle) {
    var toggle = document.getElementById(IdToToggle);
    if (toggle.style.display === "none") {
        toggle.style.display = "block";
    } else {
        toggle.style.display = "none";
    }
}

function activeMenuElementColor(elementId) {
    document.getElementById(elementId).style.color = "#ff0000";
}

function useCase1() {
    $("#useCase1submit1").click(function() {
        if (document.getElementById('useCase1Kundennummer').validity.valid) {
            hideAndShow('useCase1step1', 'useCase1step2');
            useCase1step2();
        } else {
            alert("Bitte geben Sie eine Kundennummer ein.");
        }
    });
}

function useCase1step2() {
    var useCase1Kundennummer = $("#useCase1Kundennummer").val();
    $('#useCase1step2').html("Bitte Warten");
    $.ajax({
        type: "POST",
        url: '../php/useCase1Service.php',
        data: {functionname: 'useCase1Step2', arguments: [useCase1Kundennummer]}, 
         success:function(data) {
            $('#useCase1step2').html(data);
         }
    });
}

function useCase2() {
    $('.useCaseArea').html("<p>Not implemented</p>");
}

function useCase3() {
    $('.useCaseArea').html("<p>Not implemented</p>");
}

function usecase1PrintDoc(row) {
    $('#useCase1step2').html("Download startet...");
    window.location.href = '../utils/usecase1utils.php?row='.concat(row);
    $('#useCase1step2').html("Fertig");
}