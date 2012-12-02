package com.geniosol.wasacrm;

import android.annotation.SuppressLint;
import android.app.ActionBar;
import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;

@SuppressLint("CommitPrefEdits")
public class MainActivity extends Activity implements OnClickListener {

	enum UserType {WITH_LOGIN, WITHOUT_LOGIN};
	private View dbReportIssue;
	private View dbAssigntome;
	private View dbReplybyme;
	private View dbresolved;
	private View dbSettings;
	private View dbViewissues;
	private View dbFeedback;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		ActionBar actionBar = getActionBar();
		actionBar.setSubtitle("Dashboard");
		actionBar.setDisplayHomeAsUpEnabled(true);
		
		dbReportIssue = findViewById(R.id.dashb_reportissue);
		dbReportIssue.setOnClickListener(this);
		dbReportIssue.setVisibility(View.GONE);
		dbAssigntome = findViewById(R.id.dashb_assigntome);
		dbAssigntome.setOnClickListener(this);
		dbAssigntome.setVisibility(View.GONE);
		dbReplybyme = findViewById(R.id.dashb_repbyme);
		dbReplybyme.setOnClickListener(this);
		dbReplybyme.setVisibility(View.GONE);
		dbresolved = findViewById(R.id.dashb_resolved);
		dbresolved.setOnClickListener(this);
		dbresolved.setVisibility(View.GONE);
		dbSettings = findViewById(R.id.dashb_settings);
		dbSettings.setOnClickListener(this);
		dbSettings.setVisibility(View.GONE);
		dbViewissues = findViewById(R.id.dashb_viewissues);
		dbViewissues.setOnClickListener(this);
		dbViewissues.setVisibility(View.GONE);
		dbFeedback = findViewById(R.id.dashb_beedback);
		dbFeedback.setOnClickListener(this);
		dbFeedback.setVisibility(View.GONE);
		
		this.makeDashboard();
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		
		SharedPreferences settings = getSharedPreferences("User-Session", Context.MODE_PRIVATE);
		int userId = settings.getInt("user_name", -1);
		System.out.println("User Id : " + userId);
		if (userId != -1)
			getMenuInflater().inflate(R.menu.main_menu, menu);
		else
			getMenuInflater().inflate(R.menu.activity_main, menu);

		return true;
	}
	
	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
	    switch (item.getItemId()) {
	        case android.R.id.home:
	            // app icon in action bar clicked; go home
	            Intent intent = new Intent(this, MainActivity.class);
	            intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
	            startActivity(intent);
	            return true;
	        case R.id.logout_menu:
	        	SharedPreferences settings = getSharedPreferences("User-Session", Context.MODE_PRIVATE);
	    		SharedPreferences.Editor editor = settings.edit();
	    		editor.clear();
	    		editor.commit();
	    		finish();
	    		startActivity(new Intent(MainActivity.this, LoginActivity.class));
	    		return true;
	        default:
	        	System.out.println("item : " + item.getItemId());
	            return super.onOptionsItemSelected(item);
	    }
	}

	@Override
	public void onClick(View arg0) {
		// TODO Auto-generated method stub
		switch(arg0.getId())
		{
		case R.id.dashb_reportissue:
			startActivity(new Intent(MainActivity.this, ReportIssueActivity.class));
			break;
		case R.id.dashb_assigntome:
			
			break;
		case R.id.dashb_repbyme:
			
			break;
		case R.id.dashb_resolved:
			
			break;
		case R.id.dashb_settings:
			
			break;
		case R.id.dashb_viewissues:
			
			break;
		case R.id.dashb_beedback:
		
			break;
		}
	}
	
	public UserType getUserType()
	{
		SharedPreferences settings = getSharedPreferences("User-Session", Context.MODE_PRIVATE);
		int userID = settings.getInt("user_name", -1);
		return (userID != -1) ? UserType.WITH_LOGIN : UserType.WITHOUT_LOGIN;
	}
	
	public void makeDashboard()
	{
		if (this.getUserType() == UserType.WITH_LOGIN)
		{
			dbReportIssue.setVisibility(View.VISIBLE);
			dbAssigntome.setVisibility(View.VISIBLE);
			dbReplybyme.setVisibility(View.VISIBLE);
			dbresolved.setVisibility(View.VISIBLE);
			dbSettings.setVisibility(View.VISIBLE);
			dbViewissues.setVisibility(View.VISIBLE);
			dbFeedback.setVisibility(View.VISIBLE);
		}
		else
		{
			dbReportIssue.setVisibility(View.VISIBLE);
			dbReplybyme.setVisibility(View.VISIBLE);
			dbSettings.setVisibility(View.VISIBLE);
			dbFeedback.setVisibility(View.VISIBLE);
		}
	}
}
