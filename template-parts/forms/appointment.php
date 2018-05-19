<h3 id="schedule-headline">Schedule an Appointment!</h3>
<form id="sideform">
    <div id="toprow-appt" style="display:flex;">
        <div class="form-item long">
            <label>FULL NAME</label>
            <input type="text" name="name" placeholder="Jane Doe"><br>
        </div>
        <div class="form-item mid">
            <label>TELEPHONE:</label>
            <input type="tel" name="phone" placeholder="(123) 456-7890"><br>
        </div>
        <div class="form-item long">
            <label>EMAIL:</label>
            <input type="email" name="email" placeholder="jane@janedoe.com"><br>
        </div>
    </div>
    <div id="bottomrow-appt" style="display:flex;">
        <div class="form-item mid">
            <label>DATE:</label>
            <input type="date" value="2017-10-01" name="date"><br>
        </div>
        <div class="form-item small">
            <label>TIME:</label>
            <input type="time" name="time" value="08:30:00" step="1800"><br>
        </div>
        <div class="form-item long">
            <label>CITY:</label>
            <input type="text" name="city" placeholder="Oakdale"><br>
        </div>
        <div class="form-item small">
            <label>STATE:</label>
            <select id="stateselector">
                <option value="AL">AL</option>
                <option value="AK">AK</option>
                <option value="AR">AR</option>
                <option value="AZ">AZ</option>
                <option value="CA">CA</option>
                <option value="CO">CO</option>
                <option value="CT">CT</option>
                <option value="DC">DC</option>
                <option value="DE">DE</option>
                <option value="FL">FL</option>
                <option value="GA">GA</option>
                <option value="HI">HI</option>
                <option value="IA">IA</option>
                <option value="ID">ID</option>
                <option value="IL">IL</option>
                <option value="IN">IN</option>
                <option value="KS">KS</option>
                <option value="KY">KY</option>
                <option value="LA">LA</option>
                <option value="MA">MA</option>
                <option value="MD">MD</option>
                <option value="ME">ME</option>
                <option value="MI">MI</option>
                <option value="MN">MN</option>
                <option value="MO">MO</option>
                <option value="MS">MS</option>
                <option value="MT">MT</option>
                <option value="NC">NC</option>
                <option value="NE">NE</option>
                <option value="NH">NH</option>
                <option value="NJ">NJ</option>
                <option value="NM">NM</option>
                <option value="NV">NV</option>
                <option value="NY">NY</option>
                <option value="ND">ND</option>
                <option value="OH">OH</option>
                <option value="OK">OK</option>
                <option value="OR">OR</option>
                <option value="PA">PA</option>
                <option value="RI">RI</option>
                <option value="SC">SC</option>
                <option value="SD">SD</option>
                <option value="TN">TN</option>
                <option value="TX">TX</option>
                <option value="UT">UT</option>
                <option value="VT">VT</option>
                <option value="VA">VA</option>
                <option value="WA">WA</option>
                <option value="WI">WI</option>
                <option value="WV">WV</option>
                <option value="WY">WY</option>
            </select>
        </div>
    </div>
</form>

<button id="submitButton"  form="sideform" value="Submit" onClick="switchBg()">Schedule</button>
<div id="looking-forward">
    <h2>We Look Forward to Speaking With You!</h2>
</div>
