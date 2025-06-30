// Delphi LAMP Server - Client Script

$(document).ready(function () {
    console.log("Delphi LAMP JS loaded.");

    // Highlight service status items on hover
    $(".status li").hover(
        function () {
            $(this).css("background-color", "#eef6ff");
        },
        function () {
            $(this).css("background-color", "transparent");
        }
    );

    // Toggle visibility of system status
    $("#toggle-status").click(function () {
        $(".status").slideToggle();
        $(this).text(function (i, text) {
            return text === "Hide System Status" ? "Show System Status" : "Hide System Status";
        });
    });

    // Display current time (local system time)
    updateTime();
    setInterval(updateTime, 1000);

    // Simple fade-in animation on container
    $(".container").hide().fadeIn(600);

    // Refresh service status periodically
    refreshServiceStatus();
    setInterval(refreshServiceStatus, 30000);
});

// Show live system time in the footer (optional)
function updateTime() {
    const now = new Date();
    const timeStr = now.toLocaleTimeString();
    $("#current-time").text("Local Time: " + timeStr);
}

// Fetch and update service status list
function refreshServiceStatus() {
    $.getJSON(BASE_URL + '/api/status.php', function(data) {
        const list = $('#service-status-list');
        list.empty();
        $.each(data, function(service, status) {
            const item = $('<li>').html('<strong>' + service.toUpperCase() + ':</strong> ' + status);
            list.append(item);
        });
    });
}
