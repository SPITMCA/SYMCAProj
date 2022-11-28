package com.example.digitaldiary.homepage_recycler_adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.example.digitaldiary.R;
import com.example.digitaldiary.models.ImageDataModel;

import java.util.List;

public class CardImageAdapter extends RecyclerView.Adapter<CardImageAdapter.CardViewHolder> {

    private List<ImageDataModel> itemList;
    private Context context;
    //private MovieAPI movieAPI;

    public CardImageAdapter(List<ImageDataModel> list, Context context){
        this.itemList = list;
        this.context = context;
        //this.movieAPI = new MovieAPI();
    }

    @NonNull
    @Override
    public CardViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater
                .from(parent.getContext())
                .inflate(
                        R.layout.cardview_scroll_with_filter,
                        parent, false);

        return new CardViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull CardViewHolder holder, int position) {
        ImageDataModel childItem = itemList.get(position);

        //Bitmap bmp = BitmapFactory.decodeByteArray(childItem.getImage(), 0, childItem.getImage().length);

        //image.setImageBitmap(Bitmap.createScaledBitmap(bmp, image.getWidth(), image.getHeight(), false));

        //holder.cardImage.setImageBitmap(Bitmap.createScaledBitmap(bmp, bmp.getWidth(), bmp.getHeight(), false));
        //holder.cardImage.setImageResource(R.drawable.bates_motel);

        /*Glide.with(context)
                .asBitmap()
                .load(childItem.getImage())
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .placeholder(R.drawable.ic_launcher_foreground)
                .into(holder.cardImage);*/

        Glide.with(context)
                .load(childItem.getImagePath())
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .placeholder(R.drawable.ic_launcher_foreground)
                .into(holder.cardBlurImage);

        Glide.with(context)
                .load(childItem.getImagePath())
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .placeholder(R.drawable.ic_launcher_foreground)
                .into(holder.cardImage);

        //for TV shows (synced with firebase)
        //firebase path will contain "/" symbol

        //uncomment this if required
        /*if (childItem.getPath().contains("/")) {
            holder.cardImage.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    String[] elements = childItem.getPath().split("/");

                    String show = elements[elements.length - 1];
                    String industry = elements[elements.length - 2];
                    String genre = elements[elements.length - 3];

                    if (show.indexOf(".") > 0)
                        show = show.substring(0, show.lastIndexOf("."));

                    ShowsDatabase showsDatabase = new ShowsDatabase(context);

                    //description fragment will open from this method
                    showsDatabase.getDetails(show, industry, genre, childItem.getImage());
                }
            });
        }*/

        //for movies (getting data from MovieAPI) (MovieViewModel calls MovieAPI)
        //uncomment this if required
        /*else{
            holder.cardImage.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    //Toast.makeText(context, "Clicked on: " + childItem.getPath(), Toast.LENGTH_SHORT).show();

                    //Movie movie = movieAPI.getMovieByName(childItem.getPath());
                    //Movie movie = movieAPI.getMovieById(childItem.getMovie_id(), context);
                    //movieAPI.getMovieWatchProviders(childItem.getMovie_id());

                    //this method will open the Movie Description Fragment
                    movieAPI.getMovieById(childItem.getMovie_id(), context);
                }
            });
        }*/
    }

    @Override
    public int getItemCount() {
        return itemList.size();
    }

    public class CardViewHolder extends RecyclerView.ViewHolder{
        private ImageView cardImage;
        private ImageView cardBlurImage;

        public CardViewHolder(View itemView){
            super(itemView);
            this.cardImage = itemView.findViewById(R.id.cardView_image);
            this.cardBlurImage = itemView.findViewById(R.id.cardView_blur_image);
        }
    }
}
