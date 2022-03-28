<form action="#" method="POST">
   @csrf
   @method('PUT')
   <input name="name" type="text" placeholder="intituler de la question" value="{{ @if($response->name) $response->name  @endif}}">
{{--    <input name="illustration" type="file" value="{{ @if isset($response)$response['illustration'] @endif}}">
   <input name="reponse_1" type="text" value="{{ @if isset($response)$response->reponse_1 @endif}}">
   <input name="reponse_2" type="text" value="{{ @if isset($response)$response->reponse_2 @endif}}">
   <input name="reponse_3" type="text" value="{{ @if isset($response)$response->reponse_3 @endif}}">
   <input name="reponse_4" type="text" value="{{ @if isset($response)$response->reponse_4 @endif}}">
   {{ @if isset($response) }}
   <input type="hidden" name="id" value="{{$response['id']}}" >;
   {{ @endif;}} --}}
</form>