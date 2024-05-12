const maincontainer = document.querySelector('#maincontainer');


fetch('tenantsearchpage.php')
    .then(response => response.json())
        .then(data => {
            // const jsonlen = Object.keys(data);
            console.log(data);

        });