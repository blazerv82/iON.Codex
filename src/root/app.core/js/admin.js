$(document).ready(function() {

    adminShowAll();

    // Reach out to PHP, grab all posts for admin, output to webpage
    async function adminShowAll(){

        try {
            await fetch(`app.core/php/js_to_php.php?action=adminShowAll`, {
                method: 'GET',
            })
            .then (response => {
                return response.text();
            })
            .then (data => {
                return $('#admin_results').html(data);
            })
            .catch (err => {
                throw err;
            });
        } 
        catch (err) { console.error('Error:', err); }
    }
})