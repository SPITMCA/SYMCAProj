package com.example.digitaldiary.adapters;

import android.content.Context;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.example.digitaldiary.R;
import com.example.digitaldiary.models.ImageDataModel;
import com.example.digitaldiary.models.ImageWithFilterParent;
import com.example.digitaldiary.repository.SQLiteDB;

import java.util.ArrayList;

public class ListAllPhotosAdapter extends RecyclerView.Adapter<ListAllPhotosAdapter.AllPhotosViewHolder> {

    private Context context;
    private SQLiteDB sqLiteDB;
    private ArrayList<String> allLabels;
    private ArrayList<ImageWithFilterParent> images;
    private RecyclerView.RecycledViewPool viewPool = new RecyclerView.RecycledViewPool();

    public ListAllPhotosAdapter(Context context) {
        this.context = context;
        this.images = new ArrayList<>();
        this.sqLiteDB = SQLiteDB.getInstance(context);
        this.allLabels = (ArrayList<String>) this.sqLiteDB.ImageDao().getAllLabels();

        Log.d("ListAllPhotosAdapter", "allLabels size: " + allLabels.size());

        for (int i = 0; i < this.allLabels.size(); i++){
            /*boolean isPresent = false;

            int k = 0;

            for (k = 0; k < images.size(); k++) {
                if (images.get(k).getFilter().equals(allLabels.get(i))) {
                    isPresent = true;
                }
            }

            Log.d("ListAllPhotosAdapter", "IsPresent: " + isPresent);

            if (isPresent) {
                ImageWithFilterParent temp = images.get(k);
                temp.setImages(temp.getImages());
                labelledImages.put(imageLabels.get(0).getText(), temp);
            }

            else {
                ArrayList<ImageDataModel> temp = new ArrayList<>();
                temp.add(images.get(finalI));
                labelledImages.put(imageLabels.get(0).getText(), temp);
            }*/

            boolean isPresent = false;

            for (int j = 0; j < this.images.size(); j++){
                if (this.images.get(j).getFilter().equals(this.allLabels.get(i))){
                    isPresent = true;
                    break;
                }
            }

            if (!isPresent) {
                Log.d("ListAllPhotosAdapter", "Inside Constructor current label: " + allLabels.get(i));

                ArrayList<ImageDataModel> temp = (ArrayList<ImageDataModel>) this.sqLiteDB.ImageDao().getImagesMatchingQuery(this.allLabels.get(i));

                Log.d("ListAllPhotosAdapter", "Inside Constructor temp size: " + temp.size());

                this.images.add(new ImageWithFilterParent(this.allLabels.get(i), temp));
            }

            else{
                continue;
            }
        }
    }

    @NonNull
    @Override
    public ListAllPhotosAdapter.AllPhotosViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(context)
                .inflate(R.layout.list_all_photos_recycler_view, parent, false);

        return new AllPhotosViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ListAllPhotosAdapter.AllPhotosViewHolder holder, int position) {
        ImageWithFilterParent temp = this.images.get(position);

        holder.label.setText(temp.getFilter());

        Log.d("ListAllPhotosAdapter", "images size: " + this.images.size());

        LinearLayoutManager layoutManager
                = new LinearLayoutManager(
                holder
                        .listPhotosRecyclerView
                        .getContext(),
                LinearLayoutManager.HORIZONTAL,
                false);

        layoutManager
                .setInitialPrefetchItemCount(
                        temp
                                .getImages()
                                .size());

        ListFoundPhotosAdapter childItemAdapter = new ListFoundPhotosAdapter(context, temp.getImages());

        Log.d("ListAllPhotosAdapter", "inside current parent image size: " + temp.getImages().size());

        holder.listPhotosRecyclerView.setLayoutManager(layoutManager);
        holder.listPhotosRecyclerView.setAdapter(childItemAdapter);
        //holder.listPhotosRecyclerView.setRecycledViewPool(viewPool);
    }

    @Override
    public int getItemCount() {
        return this.images.size();
    }

    public class AllPhotosViewHolder extends RecyclerView.ViewHolder{
        private TextView label;
        private RecyclerView listPhotosRecyclerView;

        public AllPhotosViewHolder(@NonNull View itemView) {
            super(itemView);
            this.label = itemView.findViewById(R.id.label_textView);
            this.listPhotosRecyclerView = itemView.findViewById(R.id.list_images_with_label_recyclerView);
        }
    }
}
