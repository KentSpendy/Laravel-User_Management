@extends('layouts.app')

@section('content')
<div class="panel hologram">
    <h2 class="panel-title">
        <i class="fas fa-id-card"></i>
        IMPERIAL PERSONNEL DOSSIER
    </h2>

    <div class="imperial-profile">
        <div class="profile-header">
            @if($user->avatar)
                <div class="profile-avatar">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Imperial Identification" class="avatar-image">
                    <div class="avatar-frame"></div>
                </div>
            @endif
            
            <div class="profile-identity">
                <h3 class="profile-name">{{ $user->first_name }} {{ $user->last_name }}</h3>
                <div class="profile-rank">{{ ucfirst($user->role) }}</div>
            </div>
        </div>

        <div class="profile-details">
            <div class="detail-row">
                <span class="detail-label">IDENTIFICATION CODE:</span>
                <span class="detail-value">{{ $user->email }}</span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">SECURITY CLEARANCE:</span>
                <span class="detail-value">
                    {{ ucfirst($user->role) }}
                    @if($user->role == 'admin')
                        <i class="fas fa-shield-alt clearance-icon" title="Officer Clearance"></i>
                    @else
                        <i class="fas fa-helmet-battle clearance-icon" title="Trooper Clearance"></i>
                    @endif
                </span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">HOLONET VERIFICATION:</span>
                <span class="detail-value {{ $user->email_verified_at ? 'verified' : 'unverified' }}">
                    {{ $user->email_verified_at ? 'VERIFIED' : 'UNVERIFIED' }}
                    @if($user->email_verified_at)
                        <i class="fas fa-check-circle status-icon"></i>
                    @else
                        <i class="fas fa-times-circle status-icon"></i>
                    @endif
                </span>
            </div>
        </div>

        <div class="profile-actions">
            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i>
                RETURN TO PERSONNEL DATABASE
            </a>
        </div>
    </div>
</div>

<style>
    /* Profile Specific Styles */
    .imperial-profile {
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }
    
    .profile-header {
        display: flex;
        align-items: center;
        gap: 2rem;
        flex-wrap: wrap;
        border-bottom: 1px solid rgba(0, 162, 255, 0.3);
        padding-bottom: 1.5rem;
    }
    
    .profile-avatar {
        position: relative;
        width: 120px;
        height: 120px;
    }
    
    .avatar-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 4px;
        position: relative;
        z-index: 1;
    }
    
    .avatar-frame {
        position: absolute;
        top: -5px;
        left: -5px;
        right: -5px;
        bottom: -5px;
        border: 2px solid var(--imperial-red);
        border-radius: 6px;
        z-index: 2;
        pointer-events: none;
    }
    
    .profile-identity {
        flex: 1;
    }
    
    .profile-name {
        color: var(--hoth-white);
        font-size: 1.8rem;
        margin-bottom: 0.5rem;
        letter-spacing: 1px;
    }
    
    .profile-rank {
        background: rgba(225, 11, 11, 0.2);
        color: var(--rebel-yellow);
        padding: 0.3rem 1rem;
        border-radius: 4px;
        display: inline-block;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    
    .profile-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }
    
    .detail-row {
        background: rgba(0, 20, 40, 0.5);
        padding: 1rem;
        border-radius: 4px;
        border-left: 3px solid var(--lightsaber-blue);
    }
    
    .detail-label {
        display: block;
        color: var(--carbonite);
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.3rem;
    }
    
    .detail-value {
        color: var(--hoth-white);
        font-size: 1.1rem;
        font-family: 'Electrolize', sans-serif;
    }
    
    .verified {
        color: var(--carbonite);
    }
    
    .unverified {
        color: var(--imperial-red);
    }
    
    .status-icon {
        margin-left: 0.5rem;
    }
    
    .clearance-icon {
        margin-left: 0.5rem;
        color: var(--rebel-yellow);
    }
    
    .profile-actions {
        margin-top: 2rem;
        border-top: 1px solid rgba(0, 162, 255, 0.3);
        padding-top: 1.5rem;
    }
    
    /* Responsive adjustments */
    @media (max-width: 600px) {
        .profile-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .profile-details {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection