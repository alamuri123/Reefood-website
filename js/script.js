

// Added scriptn from here 

        // JavaScript function to hide the accepted order row
        function hideAcceptedOrder(orderNumber) {
            var row = document.getElementById('orderRow-' + orderNumber);
            if (row) {
                row.style.display = 'none'; // Hide the row
            }
        }
