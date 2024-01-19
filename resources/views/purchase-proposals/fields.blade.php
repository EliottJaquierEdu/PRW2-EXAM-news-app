@error('email')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<label>
    Email :
    <input type="email" name="email" required value="{{ $proposal->email }}">
</label>
<br>
@error('amount')
<div class="alert alert-danger">{{ $message }}</div>
@enderror
<label>
    Montant
    <input type="number" name="amount" min="1" max="9999999" required step=".05" value="{{ $proposal->amount }}"> CHF
</label>
