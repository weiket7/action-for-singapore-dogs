Name: {{ $input['name'] }}<br>
Email: {{ $input['email'] }}<br>
Mobile: {{ $input['mobile'] }}<br>
<br>
Date of class: {{ \App\Helpers\ViewHelper::formatDate($input['date']) }}<br>
Breed of dog: {{ $input['breed'] }}<br>
Gender of dog: {{ $input['gender'] == "M" ? "Male" : "Female" }}<br>
Age of dog: {{ $input['age'] }}<br>
Whether dog is sterilised: {{ $input['sterilised'] == "Y" ? "Yes" : "No" }}<br>
