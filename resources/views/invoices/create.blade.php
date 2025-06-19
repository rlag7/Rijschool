<script src="https://cdn.tailwindcss.com"></script>

<form action="{{ route('invoices.store') }}" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg space-y-6">
    @csrf

    <label class="block font-semibold text-gray-700">Registratie:</label>
    <select name="registration_id" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        @foreach($registrations as $reg)
            <option value="{{ $reg->id }}">{{ $reg->student->user->full_name }}</option>
        @endforeach
    </select>
    @error('registration_id')
    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
    @enderror

    <label class="block font-semibold text-gray-700">Factuurnummer:</label>
    <input name="invoice_number" placeholder="Factuurnummer" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
    @if($errors->has('error'))
        <p class="text-red-600 mt-1">{{ $errors->first('error') }}</p>
    @endif

    @error('invoice_number')
    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
    @enderror

    <label class="block font-semibold text-gray-700">Factuurdatum:</label>
    <input type="date" name="invoice_date" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
    @error('invoice_date')
    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
    @enderror

    <label class="block font-semibold text-gray-700">Bedrag excl. btw:</label>
    <input id="amount_excl_vat" name="amount_excl_vat" placeholder="Bedrag excl. btw" required type="number" step="0.01" min="0" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
    @error('amount_excl_vat')
    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
    @enderror

    <label class="block font-semibold text-gray-700">BTW (21%):</label>
    <input id="vat" name="vat" placeholder="BTW" readonly class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-2 cursor-not-allowed" />
    @error('vat')
    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
    @enderror

    <label class="block font-semibold text-gray-700">Totaal incl. btw:</label>
    <input id="amount_incl_vat" name="amount_incl_vat" placeholder="Totaal incl. btw" readonly class="w-full bg-gray-100 border border-gray-300 rounded px-3 py-2 cursor-not-allowed" />
    @error('amount_incl_vat')
    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
    @enderror

    <label class="block font-semibold text-gray-700">Status:</label>
    <select name="status" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option value="open">Open</option>
        <option value="paid">Betaald</option>
        <option value="overdue">Achterstallig</option>
    </select>
    @error('status')
    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
    @enderror

    <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 rounded hover:bg-blue-700 transition">Aanmaken</button>
    <a href="{{ url()->previous() }}" class="inline-block px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
        Terug
    </a>

</form>

<script>
    const amountExclVatInput = document.getElementById('amount_excl_vat');
    const vatInput = document.getElementById('vat');
    const amountInclVatInput = document.getElementById('amount_incl_vat');

    amountExclVatInput.addEventListener('input', () => {
        const excl = parseFloat(amountExclVatInput.value) || 0;
        const vat = +(excl * 0.21).toFixed(2);
        const incl = +(excl + vat).toFixed(2);

        vatInput.value = vat;
        amountInclVatInput.value = incl;
    });
</script>
