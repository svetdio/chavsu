$(function () {
    const keywordsTextarea = document.getElementById('keywords');
    const saveButton = document.getElementById('saveButton');

    // Disable save button initially
    saveButton.disabled = true;

    // Add an event listener to the text area
    keywordsTextarea.addEventListener('input', function () {
        // Enable the save button if the text area has input, otherwise disable it
        saveButton.disabled = keywordsTextarea.value.trim() === '';
    });

    saveButton.addEventListener('click', function () {
        // Replace this with your save functionality
        let k = $('#keywords').val();

        $.post('api/save_keyword.php', { k }, function (d) {
            getKeywords();
        })
    });

    // You should perform proper validation before sending data to the serve
    const getKeywords = function () {
        $.get('api/view_keyword.php', function (d) {
            let data = JSON.parse(d)
            if (data.success) {
                let rows = []
                itr = 0;
                data.keywords.forEach(keyword => {
                    rows[itr++] = "<tr>"
                    rows[itr++] = "<td>" + keyword.keywords + "</td>"
                    rows[itr++] = "</tr>"
                });

                $('table tbody#keywordTableBody').html(rows.join())
            } else {
                alert('No Data')
            }
        })
    }
    getKeywords();
})