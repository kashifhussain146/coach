@component('emails.message')
<tr>
    <td>
        <center class="">
            <table cellpadding="0" cellspacing="0" class=""
                style="margin: 0 auto;" width="75%">
                <tbody class="">
                    <tr class="">
                        <td class=""
                            style="color:#444; font-weight: 400;">
                            <br><br>
                            We're excited to have you on board! Your account has been created successfully.<br>
                            <br>
                            Your login credentials are provided below:
                            <br><br>
                            <span style="font-weight:bold;">Email:
                                &nbsp;</span><span
                                style="font-weight:lighter;"
                                class="">{{ $user->email }}</span>
                            <br><br>
                            <span style="font-weight:bold;">Password:
                                &nbsp;</span><span
                                style="font-weight:lighter;"
                                class="">{{ $password }}</span>
                            <br><br>
                            <br>
                        </td>
                    </tr>
                </tbody>
            </table>
        </center>
    </td>
</tr>
@endcomponent