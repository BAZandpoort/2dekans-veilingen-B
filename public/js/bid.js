function bid() {
  const currentBidElement = document.getElementById('currentBid');
  const suggestedBidElement = document.getElementById('suggestedBid');
  const biddersElement = document.getElementById('bidders');
  const bidInputElement = document.getElementById('bidInput');

  let currentBid = Number(currentBidElement.innerHTML.split('€')[1]);
  let suggestedBid = Number(suggestedBidElement.innerHTML.split('€')[1]);
  let bidders = Number(biddersElement.innerHTML);

  let input = bidInputElement.value;

  if (isNaN(input)) {
    alert('Please enter a number');
    return;
  }

  if (input <= currentBid) {
    alert('Please enter a higher bid');
    return;
  }

  if (input > suggestedBid) {
    suggestedBidElement.innerHTML = '€' + input;
  }

  currentBidElement.innerHTML = '€' + input;
  biddersElement.innerHTML = bidders + 1;
}