public function loginUser(Request $request){
$validator = $request->validate(
[
'email' =>'required|email|max:100',
'password' =>'required|min:6|max:100',
]);

try{
$resp=Auth::attempt([
'email'=>$request->email,
'password'=> $request->password]);
if($resp)
{
dd('text');
}else{
dd("jjjj");
}
}catch (\Exception $exception){
dd($exception->getMessage());
}
}
