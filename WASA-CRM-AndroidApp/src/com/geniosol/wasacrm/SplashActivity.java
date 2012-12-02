package com.geniosol.wasacrm;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.animation.Animation;
import android.view.animation.Animation.AnimationListener;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;

public class SplashActivity extends Activity implements AnimationListener {

	private int splashTime = 500;

	/** Called when the activity is first created. */
	@Override
	public void onCreate(Bundle savedInstanceState) 
	{
		super.onCreate(savedInstanceState);
		setContentView(R.layout.splash_screen);
		
		ImageView img = (ImageView) findViewById(R.id.imageView1);
		
		final Animation a = AnimationUtils.loadAnimation(this, R.anim.splash_anim);
		img.startAnimation(a);
		a.setFillAfter(true);
		a.setAnimationListener(this);   
	}

	@Override
	public void onAnimationEnd(Animation arg0) {
		// TODO Auto-generated method stub
		//splashTread.start();
		try {
			Thread.sleep(splashTime);
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		finish();
		startActivity(new Intent(SplashActivity.this, LoginActivity.class));	
	}

	@Override
	public void onAnimationRepeat(Animation arg0) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void onAnimationStart(Animation arg0) {
		// TODO Auto-generated method stub
		
	}
}
