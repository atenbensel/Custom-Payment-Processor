const express = require('express');
const app = express();
const bodyParser = require('body-parser');

// Set up middleware to parse incoming JSON data
app.use(bodyParser.json());

// Define a route for processing payments
app.post('/process-payment', (req, res) => {
  // Get the payment details from the request body
  const { name, cardNumber, cvv, expiryDate, amount } = req.body;

  // Perform the payment processing logic here
  // For example, you could check if the card number and CVV are valid,
  // and then deduct the amount from the user's account or send it to your bank

  // Once the payment has been processed, update the HTML page with the payment status
  res.json({ success: true, message: 'Payment processed successfully' });
});

// Start the server
app.listen(3000, () => console.log('Server started on port 3000'));
