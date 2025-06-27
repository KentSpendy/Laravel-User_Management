@extends('layouts.app')

@section('content')
<div class="panel hologram">
    <h2 class="panel-title">
        <i class="fas fa-user-edit"></i>
        EDIT IMPERIAL PERSONNEL RECORD
    </h2>

    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="imperial-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label class="form-label">FIRST NAME:</label>
            <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" 
                   class="form-control imperial-input" required>
        </div>

        <div class="form-group">
            <label class="form-label">LAST NAME:</label>
            <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" 
                   class="form-control imperial-input" required>
        </div>

        <div class="form-group">
            <label class="form-label">NEW SECURITY CODE <span class="imperial-note">(leave blank to maintain current)</span>:</label>
            <input type="password" name="password" placeholder="Enter new security code" 
                   class="form-control imperial-input">
            <input type="password" name="password_confirmation" placeholder="Confirm new security code" 
                   class="form-control imperial-input" style="margin-top: 0.5rem;">
        </div>

        <div class="form-group">
            <label class="form-label">RANK CLEARANCE:</label>
            <select name="role" class="form-control imperial-select" required>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Stormtrooper</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Officer (Admin)</option>
            </select>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                UPDATE RECORD
            </button>
            
            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i>
                RETURN TO PERSONNEL DATABASE
            </a>
        </div>
    </form>
</div>

<style>
    /* Additional Styles for the Edit Form */
    .imperial-form {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .imperial-input {
        background: rgba(0, 20, 40, 0.8);
        border: 1px solid rgba(0, 162, 255, 0.4);
        color: var(--hoth-white);
        transition: all 0.3s ease;
        font-family: 'Electrolize', sans-serif;
    }
    
    .imperial-input:focus {
        border-color: var(--lightsaber-blue);
        box-shadow: 0 0 15px rgba(0, 162, 255, 0.6);
        background: rgba(0, 30, 60, 0.9);
    }
    
    .imperial-input::placeholder {
        color: rgba(222, 230, 239, 0.5);
    }
    
    .imperial-select {
        appearance: none;
        background: rgba(0, 20, 40, 0.8) url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="%2300c896"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat;
        background-position: right 1rem center;
        padding-right: 2.5rem;
    }
    
    .imperial-note {
        color: var(--carbonite);
        font-size: 0.8rem;
        text-transform: none;
        letter-spacing: normal;
    }
    
    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        flex-wrap: wrap;
    }
    
    .panel-title {
        position: relative;
        padding-left: 1.5rem;
    }
    
    .panel-title::before {
        content: "";
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 8px;
        height: 8px;
        background: var(--imperial-red);
        border-radius: 50%;
        box-shadow: 0 0 10px var(--imperial-red);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .form-actions {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }
    }
</style>
@endsection