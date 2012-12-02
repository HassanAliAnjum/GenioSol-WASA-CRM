package com.geniosol.wasacrm;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

import android.app.ActionBar;
import android.app.Activity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

public class ReportIssueActivity extends Activity implements OnClickListener {

	@Override
	public void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_report_issue);

		ActionBar actionBar = getActionBar();
		actionBar.setSubtitle(R.string.dashb_reporissue);
		
		Button submitBtn = (Button) this.findViewById(R.id.submitBtn);
		Button resetBtn = (Button) this.findViewById(R.id.resetBtn);

		submitBtn.setOnClickListener(this);
		resetBtn.setOnClickListener(this);

		populateSpinners();
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		getMenuInflater().inflate(R.menu.activity_report_issue, menu);
		return true;
	}

	@Override
	public void onClick(View v) {
		// TODO Auto-generated method stub

		switch(v.getId()){

		case R.id.submitBtn:
			EditText name = (EditText) this.findViewById(R.id.editText1);
			EditText address = (EditText) this.findViewById(R.id.editText2);
			EditText contact = (EditText) this.findViewById(R.id.editText3);
			EditText description = (EditText) this.findViewById(R.id.editText4);
			Spinner division = (Spinner) this.findViewById(R.id.spinner1);
			Spinner priority = (Spinner) this.findViewById(R.id.spinner2);
			Spinner category = (Spinner) this.findViewById(R.id.spinner3);

			formSubmit(name.getText().toString(), address.getText().toString(), contact.getText().toString(), "123", description.getText().toString(), priority.getSelectedItem().toString(), category.getSelectedItem().toString(), division.getSelectedItem().toString());
			break;

		case R.id.resetBtn:
			ResetForm();
			break;
		};
	}

	void populateSpinners() {

		Spinner division = (Spinner) this.findViewById(R.id.spinner1);
		Spinner priority = (Spinner) this.findViewById(R.id.spinner2);
		Spinner category = (Spinner) this.findViewById(R.id.spinner3);

		String responseStr = "";
		try
		{
			DefaultHttpClient httpClient = new DefaultHttpClient();
			HttpPost httpPost = new HttpPost("http://192.168.30.68/web/server/index.php");    

			List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
			nameValuePairs.add(new BasicNameValuePair("action", "list"));
			httpPost.setEntity(new UrlEncodedFormEntity(nameValuePairs));


			HttpResponse httpResponse = httpClient.execute(httpPost);

			BufferedReader in = new BufferedReader (new InputStreamReader(httpResponse.getEntity().getContent()));
			responseStr = in.readLine();
			in.close();
		}
		catch (ClientProtocolException e)
		{
			Log.e("EXCEPTION", "ClientProtocolException");
		}
		catch (IOException e)
		{
			Log.e("EXCEPTION", "IOException : "+e.getMessage());
		}
		finally {

			String[] spinnersValue = responseStr.split("~");
			Toast.makeText(this,spinnersValue.length + " Length",Toast.LENGTH_SHORT).show();

			String[] values = spinnersValue[0].split(":");

			ArrayAdapter spinnerArrayAdapter = new ArrayAdapter(this, android.R.layout.simple_spinner_item, values);
			spinnerArrayAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
			priority.setAdapter(spinnerArrayAdapter);

			values = spinnersValue[1].split(":");

			spinnerArrayAdapter = new ArrayAdapter(this, android.R.layout.simple_spinner_item, values);
			spinnerArrayAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
			division.setAdapter(spinnerArrayAdapter);

			values = spinnersValue[2].split(":");

			spinnerArrayAdapter = new ArrayAdapter(this, android.R.layout.simple_spinner_item, values);
			spinnerArrayAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
			category.setAdapter(spinnerArrayAdapter);
		}
	}

	void ResetForm() {

		EditText editText = (EditText) this.findViewById(R.id.editText1);
		editText.setText("");
		editText = (EditText) this.findViewById(R.id.editText2);
		editText.setText("");
		editText = (EditText) this.findViewById(R.id.editText3);
		editText.setText("");
		editText = (EditText) this.findViewById(R.id.editText4);
		editText.setText("");
		Spinner spinner = (Spinner) this.findViewById(R.id.spinner1);
		spinner.setSelection(0);
		spinner = (Spinner) this.findViewById(R.id.spinner2);
		spinner.setSelection(0);
		spinner = (Spinner) this.findViewById(R.id.spinner3);
		spinner.setSelection(0);
	}

	void formSubmit(String name, String address, String contact, String cnic, String description, String priorty, String category, String division) {

		String responseStr = ""; 

		try
		{
			DefaultHttpClient httpClient = new DefaultHttpClient();
			HttpPost httpPost = new HttpPost("http://192.168.30.68/web/server/index.php");    

			List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
			nameValuePairs.add(new BasicNameValuePair("action", "add_complaint"));
			nameValuePairs.add(new BasicNameValuePair("priority_name", priorty));
			nameValuePairs.add(new BasicNameValuePair("contact_no", contact));
			nameValuePairs.add(new BasicNameValuePair("cnic", cnic));
			nameValuePairs.add(new BasicNameValuePair("division_name", division));
			nameValuePairs.add(new BasicNameValuePair("address", address));
			nameValuePairs.add(new BasicNameValuePair("description", description));
			nameValuePairs.add(new BasicNameValuePair("user_name", name));
			nameValuePairs.add(new BasicNameValuePair("category_name", category));
			httpPost.setEntity(new UrlEncodedFormEntity(nameValuePairs));


			HttpResponse httpResponse = httpClient.execute(httpPost);

			BufferedReader in = new BufferedReader (new InputStreamReader(httpResponse.getEntity().getContent()));
			responseStr = in.readLine();
			in.close();
		}
		catch (ClientProtocolException e)
		{
			Log.e("EXCEPTION", "ClientProtocolException");
		}
		catch (IOException e)
		{
			Log.e("EXCEPTION", "IOException : "+e.getMessage());
		}
		finally {

			Toast.makeText(this,responseStr,Toast.LENGTH_SHORT).show();
			ResetForm();
		}
	}
}
