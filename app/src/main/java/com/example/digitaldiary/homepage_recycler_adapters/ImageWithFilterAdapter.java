package com.example.digitaldiary.homepage_recycler_adapters;

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

import java.util.ArrayList;
import java.util.Set;

public class ImageWithFilterAdapter extends RecyclerView.Adapter<ImageWithFilterAdapter.ShowViewHolder> {

    private RecyclerView.RecycledViewPool viewPool = new RecyclerView.RecycledViewPool();

    private ArrayList<ImageWithFilterParent> itemList;
    private Context context;

    public ImageWithFilterAdapter(ArrayList<ImageWithFilterParent> list, Context context){
        this.itemList = list;
        this.context = context;
    }

    @NonNull
    @Override
    public ShowViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater
                .from(parent.getContext())
                .inflate(
                        R.layout.image_with_filter_recyclerview_layout,
                        parent, false);

        return new ShowViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull ImageWithFilterAdapter.ShowViewHolder holder, int position) {
        //ImageWithFilterParent []parentItem = itemList.toArray(new ImageWithFilterParent[position]);
        ImageWithFilterParent parentItem = itemList.get(position);

        holder.filter.setText(parentItem.getFilter());

        Log.d("ShowWithGenreAdapter", "Title Set!! " + parentItem.getFilter());

        LinearLayoutManager layoutManager
                = new LinearLayoutManager(
                holder
                        .cardView_scroll
                        .getContext(),
                LinearLayoutManager.HORIZONTAL,
                false);

        layoutManager
                .setInitialPrefetchItemCount(
                        parentItem
                                .getImages()
                                .size());

        CardImageAdapter childItemAdapter = new CardImageAdapter(parentItem.getImages(), context);

        holder.cardView_scroll.setLayoutManager(layoutManager);
        holder.cardView_scroll.setAdapter(childItemAdapter);
        holder.cardView_scroll.setRecycledViewPool(viewPool);
    }

    @Override
    public int getItemCount() {
        return itemList.size();
    }

    public class ShowViewHolder extends RecyclerView.ViewHolder {
        private TextView filter;
        private RecyclerView cardView_scroll;

        public ShowViewHolder(final View itemView)
        {
            super(itemView);

            filter
                    = itemView
                    .findViewById(
                            R.id.filter);
            cardView_scroll
                    = itemView
                    .findViewById(
                            R.id.cardView_scroll);
        }
    }
}
