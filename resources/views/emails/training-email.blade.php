Name: {{ $training->name }}<br>
Email: {{ $training->email }}<br>
Mobile: {{ $training->mobile }}<br>
<br>
Date of class: {{ \App\Helpers\ViewHelper::formatDate($training->date) }}<br>
Breed of dog: {{ $training->breed }}<br>
Gender of dog: {{ $training->gender == "M" ? "Male" : "Female" }}<br>
Age of dog: {{ $training->age }}<br>
Whether dog is sterilised: {{ $training->sterilised == "Y" ? "Yes" : "No" }}<br>
