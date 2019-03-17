Name: {{ $adoption_form->name }}<br>
NRIC / FIN: {{ $adoption_form->identification_number }}<br>
Email: {{ $adoption_form->email }}<br>
Mobile: {{ $adoption_form->mobile }}<br>
Birthday: {{ \App\Helpers\ViewHelper::formatDate($adoption_form->birthday) }}<br>
Gender: {{ $adoption_form->gender == "M" ? "Male" : "Female" }}<br>
Address: {{ $adoption_form->address }}<br>
Postal Code: {{ $adoption_form->postal }}<br>
<br>
Dog(s) he/she is interested in: {{ $dog_names }}<br>
Enquired On: {{ \App\Helpers\ViewHelper::formatDate($adoption_form->enquired_on) }}<br>
Applied On: {{ \App\Helpers\ViewHelper::formatDate($adoption_form->applied_on) }}<br>
<br>
@foreach($answers as $answer)
  @if($answer->is_header == 1)
    <h3><u>{{ $answer->question }}</u></h3>
  @else
    <b>{{ $answer->question }}</b><br>
    {{ $answer->answer }}<br>
    <br>
  @endif
@endforeach