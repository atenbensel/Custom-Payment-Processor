<form id="payment-form">
  <label for="name">Name on card:</label>
  <input type="text" id="name" name="name"><br>

  <label for="card-number">Card number:</label>
  <input type="text" id="card-number" name="cardNumber"><br>

  <label for="cvv">CVV:</label>
  <input type="text" id="cvv" name="cvv"><br>

  <label for="expiry-date">Expiry date:</label>
  <input type="text" id="expiry-date" name="expiryDate"><br>

  <label for="amount">Amount:</label>
  <input type="text" id="amount" name="amount"><br>

  <button type="submit">Pay</button>
</form>

<p id="status-message"></p>

<script>
  const form = document.getElementById('payment-form');
  const statusMessage = document.getElementById('status-message');

  form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const name = form.elements['name'].value;
    const cardNumber = form.elements['cardNumber'].value;
    const cvv = form.elements['cvv'].value;
    const expiryDate = form.elements['expiryDate'].value;
    const amount = form.elements['amount'].value;

    const response = await fetch('/process-payment', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ name, cardNumber, cvv, expiryDate, amount }),
    });

    const responseData
if (response.ok) {
  const data = await response.json();
  statusMessage.textContent = data.message;
} else {
  statusMessage.textContent = 'Error processing payment';
}
