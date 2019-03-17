Name: {{ $donation->name }}<br>
Email: {{ $donation->email }}<br>
Mobile: {{ $donation->mobile }}<br>
<br>
Amount: ${{ $donation->amount }}<br>
Payment Method: {{ $donation->payment_method }}<br>
Ref No: {{ $donation->ref_no }}<br>
Transfer Date: {{ \App\Helpers\ViewHelper::formatDate($donation->transfer_date) }}<br>
Donated On: {{ \App\Helpers\ViewHelper::formatDate($donation->donated_on) }}
