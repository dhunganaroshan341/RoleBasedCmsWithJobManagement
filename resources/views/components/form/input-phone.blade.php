<input type="tel" name="{{ $name??'phone' }}" placeholder="9812345678" required pattern="^[0-9]{7,12}$"
    inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">