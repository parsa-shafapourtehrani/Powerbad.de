document.addEventListener('DOMContentLoaded', () => {
    // Automatically fill the date field with the current date
    const dateField = document.getElementById('Datum');
    const today = new Date();
    const formattedDate = `${today.getDate()}/${today.getMonth() + 1}/${today.getFullYear()}`;
    dateField.value = formattedDate;

    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch('/submit', {
            method: 'POST',
            body: JSON.stringify(Object.fromEntries(formData)),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            alert('Form submitted successfully!');
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
  
});

