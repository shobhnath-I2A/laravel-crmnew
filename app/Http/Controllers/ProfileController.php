<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.myprofile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request->all(), $request->validated());
        $user = $request->user();
        $data = $request->validated();

        unset($data['changeprofilepic']);

        $user->fill($data);

        if ($request->hasFile('changeprofilepic')) {
            $file = $request->file('changeprofilepic');

            if ($file->isValid()) {
                $folderPath = public_path('uploads/profile');

                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                }

                if (
                    !empty($user->profile_image) &&
                    file_exists(public_path('uploads/profile/' . $user->profile_image))
                ) {
                    unlink(public_path('uploads/profile/' . $user->profile_image));
                }

                $imageName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

                $file->move($folderPath, $imageName);

                $user->profile_image = $imageName;
            }
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile updated successfully.');
    }
    public function passwordUpdate(Request $request): RedirectResponse
    {
        $request->validate([
            'oldpassword' => ['required'],
            'newpassword' => ['required', 'min:6'],
            'repassword' => ['required', 'same:newpassword'],
        ]);

        $user = $request->user();
        if (!Hash::check($request->oldpassword, $user->password)) {
            return back()->withErrors([
                'oldpassword' => 'Old password is incorrect.',
            ]);
        }
        $user->password = Hash::make($request->newpassword);
        $user->save();
        return Redirect::route('profile.edit')->with('status', 'password-updated');
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
        $user = $request->user();
        Auth::logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
