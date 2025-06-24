{{-- resources/views/user/clients/_form.blade.php --}}

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Client Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ old('name', $client->name ?? '') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Client Type</label>
            <select class="form-control" name="type" id="clientType" required>
                <option value="individual" {{ (old('type', $client->type ?? '') == 'individual') ? 'selected' : '' }}>Individual</option>
                <option value="company" {{ (old('type', $client->type ?? '') == 'company') ? 'selected' : '' }}>Company</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Email Address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ old('email', $client->email ?? '') }}">
        </div>
    </div>
    <div class="col-md-6" id="contactPersonField" style="display: {{ (old('type', $client->type ?? 'individual') == 'company') ? 'block' : 'none' }};">
        <div class="form-group">
            <label class="form-label">Contact Person Name</label>
            <input type="text" class="form-control" name="contact_person" placeholder="Contact Person" value="{{ old('contact_person', $client->contact_person ?? '') }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Primary Phone</label>
            <input type="text" class="form-control" name="phone" placeholder="Enter Primary Phone" value="{{ old('phone', $client->phone ?? '') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Alternate Phone</label>
            <input type="text" class="form-control" name="alt_phone" placeholder="Enter Alternate Phone" value="{{ old('alt_phone', $client->alt_phone ?? '') }}">
        </div>
    </div>
</div>

<div class="form-group">
    <label class="form-label">Address</label>
    <textarea class="form-control" name="address" rows="3" placeholder="Enter full address">{{ old('address', $client->address ?? '') }}</textarea>
</div>

<div class="form-group">
    <label class="form-label">Notes</label>
    <textarea class="form-control" name="notes" rows="4" placeholder="Any additional notes about the client">{{ old('notes', $client->notes ?? '') }}</textarea>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const clientTypeSelect = document.getElementById('clientType');
    const contactPersonField = document.getElementById('contactPersonField');

    clientTypeSelect.addEventListener('change', function() {
        if (this.value === 'company') {
            contactPersonField.style.display = 'block';
        } else {
            contactPersonField.style.display = 'none';
        }
    });
});
</script>