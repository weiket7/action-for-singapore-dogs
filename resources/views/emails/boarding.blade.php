Name: {{ $boarding->name }}<br>
Email: {{ $boarding->email }}<br>
Mobile: {{ $boarding->mobile }}<br>
<br>
Breed of dog: {{ $boarding->breed }}<br>
Gender of dog: {{ $boarding->gender == "M" ? "Male" : "Female" }}<br>
Whether dog is sterilised: {{ $boarding->sterilised == "Y" ? "Yes" : "No" }}<br>
<br>
Start Date: {{ \App\Helpers\ViewHelper::formatDate($boarding->start_date) }}<br>
End Date: {{ \App\Helpers\ViewHelper::formatDate($boarding->end_date) }}<br>