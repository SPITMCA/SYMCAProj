package com.example.digitaldiary.adapters;

import android.content.Context;

import android.content.Intent;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.CheckBox;
import android.widget.ImageView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.load.engine.DiskCacheStrategy;
import com.example.digitaldiary.DisplayFullImageActivity;
import com.example.digitaldiary.R;
import com.example.digitaldiary.document_vault.CreateDocumentVaultActivity;
import com.example.digitaldiary.models.ImageDataModel;

import java.util.ArrayList;

public class ListFoundPhotosAdapter extends RecyclerView.Adapter<ListFoundPhotosAdapter.PhotosViewHolder> {
    private Context context;
    private ArrayList<ImageDataModel> images;

    public ListFoundPhotosAdapter() {

    }

    public ListFoundPhotosAdapter(Context context, ArrayList<ImageDataModel> images) {
        this.context = context;
        this.images = images;
    }

    @NonNull
    @Override
    public PhotosViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(context)
                .inflate(R.layout.list_photos_recycler_view, parent, false);

        return new PhotosViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull PhotosViewHolder holder, int position) {
        Log.d("ListFoundPhotosAdapter", "images size: " + this.images.size());

        Log.d("ListFoundPhotosAdapter", "image: " + this.images.get(position).getImagePath());

        Glide.with(context)
                .load(images.get(position).getImagePath())
                .diskCacheStrategy(DiskCacheStrategy.ALL)
                .placeholder(R.drawable.ic_launcher_foreground)
                .dontAnimate()
                .into(holder.image);

        holder.checkBox.bringToFront();
        holder.checkBox.setVisibility(View.GONE);

        holder.image.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(context, DisplayFullImageActivity.class);
                intent.putExtra("Image", "" + images.get(holder.getAdapterPosition()).getImagePath());
                context.startActivity(intent);
            }
        });

        holder.image.setOnLongClickListener(new View.OnLongClickListener() {
            @Override
            public boolean onLongClick(View view) {
                Log.d("ListFoundPhotosAdapter", "long click triggered!");
                holder.checkBox.setVisibility(View.VISIBLE);
                holder.checkBox.bringToFront();
                holder.checkBox.setChecked(true);
                notifyDataSetChanged();
                return true;
            }
        });
    }

    @Override
    public int getItemCount() {
        return this.images.size();
    }

    public class PhotosViewHolder extends RecyclerView.ViewHolder {
        private final ImageView image;
        private final CheckBox checkBox;

        public PhotosViewHolder(@NonNull View view){
            super(view);
            this.image = view.findViewById(R.id.photo);
            this.checkBox = view.findViewById(R.id.checkbox);
        }

        /*void bind(final ImageDataModel imageTemp) {
            checkBox.setVisibility(imageTemp.isChecked() ? View.VISIBLE : View.GONE);
            //textView.setText(employee.getName());

            image.setOnLongClickListener(new View.OnLongClickListener() {
                @Override
                public boolean onLongClick(View view) {
                    imageTemp.setChecked(!imageTemp.isChecked());
                    checkBox.setVisibility(imageTemp.isChecked() ? View.VISIBLE : View.GONE);

                    return false;
                }
            });
        }*/
    }
}
