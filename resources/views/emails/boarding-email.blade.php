Name: {{ $input['name'] }}<br>
Email: {{ $input['email'] }}<br>
Mobile: {{ $input['mobile'] }}<br>
<br>
Breed of dog: {{ $input['breed'] }}<br>
Gender of dog: {{ $input['gender'] == "M" ? "Male" : "Female" }}<br>
Whether dog is sterilised: {{ $input['sterilised'] == "Y" ? "Yes" : "No" }}<br>
<br>
Start Date: {{ \App\Helpers\ViewHelper::formatDate($input['start_date']) }}<br>
End Date: {{ \App\Helpers\ViewHelper::formatDate($input['end_date']) }}<br>