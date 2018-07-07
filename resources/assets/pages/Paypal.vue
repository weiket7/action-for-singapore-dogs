<template>
  <div class="container content">
    <h2>Please wait..</h2>

    <form id="paypal-form" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="display:none">
      <input name="cmd" type="hidden" value="_s-xclick"><br>
      <input name="hosted_button_id" type="hidden" value="CAJ8R4XTXXKFQ"><p></p>
      <table>
        <tbody>
        <tr>
          <td><input name="on0" type="hidden" value="Donation Amount">Donation Amount</td>
        </tr>
        <tr>
          <td><select name="os0"><option value="Ten Dollars">Ten Dollars $10.00 SGD</option><option value="Twenty Dollars">Twenty Dollars $20.00 SGD</option><option value="Fifty Dollars">Fifty Dollars $50.00 SGD</option><option value="Eighty Dollars">Eighty Dollars $80.00 SGD</option><option value="One Hundred Dollars">One Hundred Dollars $100.00 SGD</option><option value="Two Hundred Dollars">Two Hundred Dollars $200.00 SGD</option><option value="Five Hundred Dollars">Five Hundred Dollars $500.00 SGD</option><option value="Eight Hundred Dollars">Eight Hundred Dollars $800.00 SGD</option><option value="One Thousand Dollars">One Thousand Dollars $1,000.00 SGD</option><option value="Two Thousand Dollars">Two Thousand Dollars $2,000.00 SGD</option></select></td>
        </tr>
        </tbody>
      </table>
      <p><input name="currency_code" type="hidden" value="SGD"><br>
        <input alt="PayPal – The safer, easier way to pay online." name="submit" src="http://asdsingapore.com/wp/wp-content/uploads/2015/12/oie_1481947CvN8FmVf.jpg" type="image"><br>
        <img src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" alt="" width="1" height="1" border="0"></p>
    </form>
  </div>
</template>

<script>
  export default {
    name: "paypal",
    mounted() {
      document.getElementById("paypal-form").submit();
    }
  }
</script>